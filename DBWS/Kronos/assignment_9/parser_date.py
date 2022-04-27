import re
import csv
from collections import Counter

date_list = []

def date_parse(filename):
    with open(filename) as f:

        for line in f:
            if line.strip():
                line = line.strip("\n")
                date = line.split(']')[0].split('[')[1].split(':')[0]
                date_list.append(date)

        return date_list

def counter(date_list):
    return Counter(date_list)

def write_csv(counter):
    with open('output_date.csv', 'w') as csv_file:
        writer = csv.writer(csv_file)

        header = ['Date', 'Frequency']

        writer.writerow(header)

        for item in counter:
            writer.writerow((item, counter[item]))


if __name__ == '__main__':
    write_csv(counter(date_parse('logs_accessed')))



