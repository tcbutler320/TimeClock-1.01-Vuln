## Timeclock 1.01 Time-Based SQL Injection  
*This report outlines how to reproduce a time-based SQL injection in the timeclock software version 1.01* 
- [Timeclock 1.01 Time-Based SQL Injection](#timeclock-101-time-based-sql-injection)
- [Testing Timeclock 1.01 with the POC Docker](#testing-timeclock-101-with-the-poc-docker)
- [Creation of POC Docker](#creation-of-poc-docker)
    - [Update Server](#update-server)
    - [Install Depedancies](#install-depedancies)
    - [Add Docker PGP Key](#add-docker-pgp-key)
    - [Verify Fingerprint](#verify-fingerprint)
    - [Setup Stable Repository](#setup-stable-repository)
  - [Install Docker Engine](#install-docker-engine)
  - [Validate Docker Install](#validate-docker-install)
- [Install Docker Compose](#install-docker-compose)

## Testing Timeclock 1.01 with the POC Docker 




## Creation of POC Docker  
The following details outline how the POC docker file was created, including spinning up a digital ocean server, installation and configuration of docker, and configurig the dockerfile to run the vulnerable timeclock software.

1)  Create a digital ocean ubunto droplet   
2)  Log into the server via SSH  
3)  Update and upgrade server   

```bash
sudo apt-get update && apt-get upgrade  
```  

4) Follow the [Docker documentation](https://docs.docker.com/engine/install/ubuntu/) for installation on Ubunto  


#### Update Server

```bash
sudo apt-get remove docker docker-engine docker.io containerd runc
```  
#### Install Depedancies   
```bash
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common 
```

#### Add Docker PGP Key   
```bash
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```  


#### Verify Fingerprint  
```bash
sudo apt-key fingerprint 0EBFCD88
```  
#### Setup Stable Repository 

```bash
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
```  
 
### Install Docker Engine   

```bash
sudo apt-get install docker-ce docker-ce-cli containerd.io
```

### Validate Docker Install 

```bash
sudo docker run hello-world
```   

## Install Docker Compose   

```bash
apt install docker-compose
```




