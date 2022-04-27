logfile = "/var/log/apache2/access_log"
result_logfile = "logs_accessed"
group13 = '~schhabra'
group13_logs = []

with open(logfile, 'r') as read_object:
        with open(result_logfile, 'w+') as write_object:
                for line in read_object:
                        if group13 in line:
                                write_object.write(line + "\n")
        write_object.close()
read_object.close()
