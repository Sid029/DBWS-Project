import re
import csv
from collections import Counter

def reader(filename):
    with open(filename) as f:
        logs_accessed = f.read()
        
        regexp = r'\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}'

        ip_list = re.findall(regexp, logs_accessed)

        return ip_list

def counter(ip_list):
    return Counter(ip_list)

def write_csv(counter):
    with open('output.csv', 'w') as csv_file:
        writer = csv.writer(csv_file)

        header = ['IP_Address', 'Frequency']

        writer.writerow(header)

        for item in counter:
            writer.writerow((item, counter[item]))


if __name__ == '__main__':
    write_csv(counter(reader('logs_accessed')))
