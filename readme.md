# Timeclock 1.01 Time-Based SQL Injection    
This report details a time-based SQL injection attack in the Employee Timeclock software, version 1.01.  

- [Timeclock 1.01 Time-Based SQL Injection](#timeclock-101-time-based-sql-injection)
- [Overview](#overview)
  - [About Authors](#about-authors)
  - [Navigating the Report](#navigating-the-report)
  - [About Timeclock](#about-timeclock)
    - [Product Versions](#product-versions)
- [Testing the POC](#testing-the-poc)
  - [Requirements](#requirements)
    - [Docker](#docker)
    - [Docker-Compose](#docker-compose)
    - [Python](#python)
  - [Remote Testing](#remote-testing)
    - [Clone the repository](#clone-the-repository)
    - [CD into Docker](#cd-into-docker)
    - [Run the app](#run-the-app)
    - [Browse timeclock](#browse-timeclock)
  - [Local Testing](#local-testing)
    - [Clone the repository](#clone-the-repository-1)
    - [CD into Docker-Local](#cd-into-docker-local)
    - [Run the app](#run-the-app-1)
    - [Browse timeclock](#browse-timeclock-1)
- [Running Docker on Remote Server](#running-docker-on-remote-server)
  - [Spin up a server](#spin-up-a-server)
  - [Download Docker Installation Script](#download-docker-installation-script)
  - [Install Docker](#install-docker)
  - [Install Dockerized Timeclock](#install-dockerized-timeclock)


# Overview  
This report details a time-based SQL injection attack in the Employee Timeclock software, version 1.01. Included in the report are a exploit-db ready report, two dockerized timeclock 1.01 applications for testing (1 for remote and 1 for local), and this readme document.  

## About Authors  

This vulnerability was discovered by François Bibeau who also developed the proof of concept exploit. Additional support was provided by [Tyler Butler](https://tbutler.org) who developed the dockerized application and testing enviorment. 

## Navigating the Report  
A high level overview of the submission contents.

```bash
.
├── docker  # Dockerize timeclock 1.01 for remote testing
│   ├── db    
│   ├── docker-compose.yml  
│   └── timeclock  
├── docker-local  # Dockerize timeclock 1.01 for local testing
│   ├── db  
│   ├── docker-compose.yml  
│   └── timeclock  
├── PoC.py  # A PoC python script 
├── exploit-db-entry.txt  # Exploit-db ready vuln description
└── readme.md    
```

## About Timeclock

[Timeclock](http://timeclock-software.net/) is a employee time managment application managed by timeclock-software.net. According to the vendor's website,

> Timeclock-software.net's free software product will be a simple solution to allow your employees to record their time in one central location for easy access.    

The application uses php to enable employees to log working time by category, and includes administration options for admins to manage the app and employees. The download for version 1.01 includes a .sql file to create a database schema and populates it with default values

### Product Versions 

Timeclock's official website supports versions up to 1.01 which was released on 1-28-2016. It can be acquired through the [download page](http://timeclock-software.net/timeclock-download.php)

# Testing the POC  
To validate the findings of this report, the timeclock 1.01 application was dockerized into two separate apps. The app in /docker is ported to expose port 80 to the internet and can be used for testing remotely over HTTP on a server. The app in /docker-local is ported to localhost:80 and can be used to test locally.

## Requirements  
Testing the exploit described in this report requires the use of docker, docker-compose, and python.

### [Docker](https://www.docker.com/)  

*Linux*  

```bash
curl -fsSL https://get.docker.com -o get-docker.sh
```

```bash
sudo sh get-docker.sh
```

### [Docker-Compose](https://docs.docker.com/compose/)

*Linux*

Download binaries via curl
```bash
sudo curl -L "https://github.com/docker/compose/releases/download/1.26.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
``` 

Make binaries executable
```bash
sudo chmod +x /usr/local/bin/docker-compose
```  

### [Python](https://www.python.org/) 

*Linux*    

```bash
sudo apt-get install python3.6
```



## Remote Testing 
/docker contains a dockerized timeclock 1.01 application that exposes port 80 of the container to port 80 of the host. If this is run on a remote server such as a digital ocean droplet, then this will be publically available through http://[ip of server]:80

### Clone the repository 

```bash
git clone https://github.com/tcbutler320/timeclock-vuln.git
```

### CD into Docker 

```bash
cd /timeclock-vuln/docker
```

### Run the app 

```bash
docker-compose up -d
```

### Browse timeclock   
In your browser, visit http://[ip of server]

## Local Testing     
*/docker-local contains a dockerized timeclock 1.01 application that only runs locally on 127.0.0.1:80 on the host. 

### Clone the repository 

```bash
git clone https://github.com/tcbutler320/timeclock-vuln.git
```  

### CD into Docker-Local

```bash
cd /timeclock-vuln/docker-local
```  

### Run the app 

```bash
docker-compose up -d
```

### Browse timeclock   
In your browser, visit http://127.0.0.1 


# Running Docker on Remote Server   
The following steps were used to replicate the exploit on a digital ocean droplet.  

## Spin up a server
For information on setting up a droplet on digital ocean, see [How to Create a Droplet from the DigitalOcean Control Panel](https://www.digitalocean.com/docs/droplets/how-to/create/).  For information on installing docker on ubunto, see [Install Docker Engine on Ubuntu
](https://docs.docker.com/engine/install/ubuntu/)

## Download Docker Installation Script 

```bash
curl -fsSL https://get.docker.com -o get-docker.sh
```

## Install Docker 

```bash
sudo sh get-docker.sh
```  

## Install Dockerized Timeclock  
See [Remote Testing](#remote-testing) for instructions for installing the POC docker application for remote testing