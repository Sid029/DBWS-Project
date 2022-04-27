import csv

with open("error_log", 'r') as file:
	time_list = []
	ip_list = []
	err_list = []
	web_list = []

	for error in file:
		if ("/schhabra/" in error):
			time_string = error[error.find("[")+1: error.find("]")]
			time_list.append(time_string)

			ip_start = error.find("[client")+len("client")+1
			ip_end = ip_start + error[ip_start:].find("]")
			ip_string = error[ip_start: ip_end]
			ip_list.append(ip_string)
			
			err_start = ip_end + 2
			err_end = error.find("referer") - 2
			err_string = error[err_start: err_end]
			err_list.append(err_string)

			web_start = error.find("referer:")+8
			web_string = error[web_start:-1]
			web_list.append(web_string) 

with open("error_log.csv", "w+") as csvfile:
	writer = csv.writer(csvfile)
	writer.writerow(["Time", "IP", "Errors","Website"])
	for i in range(len(time_list)):
		csvfile.write("{}, {}, {},{}\n".format(time_list[i],ip_list[i], err_list[i],web_list[i]))