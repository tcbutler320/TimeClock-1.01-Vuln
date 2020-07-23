# Timeclock 1.01 Time-Based SQL Injection    
This report details a time-based SQL injection attack in the Employee Timeclock software, version 1.01.  

- [Timeclock 1.01 Time-Based SQL Injection](#timeclock-101-time-based-sql-injection)
- [Overview](#overview)
  - [Navigating the Report](#navigating-the-report)
  - [About Timeclock](#about-timeclock)
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
This report details a time-based SQL injection attack in the Employee Timeclock software, version 1.01. Included in the report are the following items;

## Navigating the Report

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
├── exploit-db-entry.txt  # Exploit-db ready vuln description
└── readme.md    
```

## About Timeclock


# Testing the POC

## Requirements  
Testing the exploit described in this report requires the use of docker, docker-compose, and python.

### Docker

*Linux*  

```bash
curl -fsSL https://get.docker.com -o get-docker.sh
```

```bash
sudo sh get-docker.sh
```

### Docker-Compose

*Linux*

Download binaries via curl
```bash
sudo curl -L "https://github.com/docker/compose/releases/download/1.26.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
``` 

Make binaries executable
```bash
sudo chmod +x /usr/local/bin/docker-compose
```  

### Python 

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