import re
import csv
from collections import Counter

url_list = []

def url_parse(filename):
    with open(filename) as f:

        for line in f:
            if line.strip():
                line = line.strip("\n")
                url = (line.split('schhabra')[1].split(' ')[0])
                url_list.append(url)

        return url_list

def counter(url_list):
    return Counter(url_list)

def write_csv(counter):
    with open('output_url.csv', 'w') as csv_file:
        writer = csv.writer(csv_file)

        header = ['Pages', 'Frequency']

        writer.writerow(header)

        for item in counter:
            writer.writerow((item, counter[item]))


if __name__ == '__main__':
    write_csv(counter(url_parse('logs_accessed')))
