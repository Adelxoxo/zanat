FROM ubuntu:latest

RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php && \
    rm -rf /var/lib/apt/lists/*

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]