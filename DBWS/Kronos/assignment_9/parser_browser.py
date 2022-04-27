import re
import csv
from collections import Counter

browser_list = []

def browser_parse(filename):
    with open(filename) as f:
        for line in f:
            if line.strip():
                line = line.strip("\n")
                start = line.find('" "')
                string = line[start:-1]
                browser_list.append(string)

        return browser_list

def counter(browser_list):
    return Counter(browser_list)

def write_csv(counter):
    with open('output_browser.csv', 'w') as csv_file:
        writer = csv.writer(csv_file)

        header = ['Browser', 'Frequency']

        writer.writerow(header)

        for item in counter:
            writer.writerow((item, counter[item]))


if __name__ == '__main__':
    write_csv(counter(browser_parse('logs_accessed')))
        
