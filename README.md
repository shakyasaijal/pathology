# Custom Object Oriented PHP based on MVC

Breast Cancer Pathology With AI Prediction Model

# Table of contents

- [Pre-requisites](#prerequisites)
- [Running it locally](#running-it-locally)
- [Project Setup](#running-it-locally)
- [Clone Database](#clone-database)
- [Credentials](#credentials)
- [Artificial Intelligence](#artificial-intelligence)

# Pre-requisites

If you want to setup PHP and run the application in your host os.

- [PHP >= v8.2](https://www.php.net/downloads.php)
- [Composer >= v2.5](https://getcomposer.org/download/)
- [Python >= 3.8.10](https://www.python.org/downloads/)
- [Virtualenv >= 20.14.0](https://pypi.org/project/virtualenv/)

# Running it locally

```
/**
    If you want to clone the repo using https use https://github.com/shakyasaijal/pathology.git instead.
*/

Clone with SSH:
$ git clone git@github.com:shakyasaijal/pathology.git
$ cd pathology
```

# Project Setup

## Important Setup
```
** Please put the root directory [pathology] in /var/www/html
```

```
/**
    The first thing you want to do is setting up the environment variables
*/

$ cd pathology/app/config
$ cp .env.example ./.env
$ sudo nano .env

Then change all the variables like database username, passwords, email address and its password, etc.
```

## PHP Setup

Pull the dependencies and start server.

```
$ composer install
```

## Python Setup

```
/**
    At first, we need to create virtual environment and install all dependencies.
*/

$ cd public/machine-learning
$ virtualenv venv
$ source venv/bin/activate
$ pip install -r requirements.txt
```

```
Now, we will start python server

$ python predict.py

```


# Clone Database

```
** I have attached pathology.sql file. You can simply import it. It somehow it does not working, then:

* Create a database named `pathology`, then import tables.sql
```

# Credentials

## Admin 

```
** Admin link

/pathology/admin

** Email

admin@admin.com

** Password

admin@123
```

## Normal User

```
** Email

user@gmail.com

** Password

user@123
```

# Artificial Intelligence

```
All AI files are located in public/machine-learning
```
