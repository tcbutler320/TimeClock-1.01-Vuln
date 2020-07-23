## Timeclock 1.01 Time-Based SQL Injection  
*This report outlines how to reproduce a time-based SQL injection in the timeclock software version 1.01* 
- [Timeclock 1.01 Time-Based SQL Injection](#timeclock-101-time-based-sql-injection)
- [Running the Dockerized Timeclock 1.01](#running-the-dockerized-timeclock-101)
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

## Running the Dockerized Timeclock 1.01

### Remote Testing 
*/docker contains a dockerized timeclock 1.01 application that exposes port 80 of the container to port 80 of the host. If this is run on a remote server such as a digital ocean droplet, then this will be publically available through http://[ip of server]:80

#### Clone the repository 

```bash
git clone https://github.com/tcbutler320/timeclock-vuln.git
```

#### CD into Docker 

```bash
cd /timeclock-vuln/docker
```

#### Run the app 

```bash
docker-compose up -d
```

#### Browse timeclock   
In your browser, visit http://[ip of server]

### Local Testing     
*/docker-local contains a dockerized timeclock 1.01 application that only runs locally on 127.0.0.1:80 on the host. 

#### Clone the repository 

```bash
git clone https://github.com/tcbutler320/timeclock-vuln.git
```  

#### CD into Docker-Local

```bash
cd /timeclock-vuln/docker-local
```  

#### Run the app 

```bash
docker-compose up -d
```

#### Browse timeclock   
In your browser, visit http://127.0.0.1