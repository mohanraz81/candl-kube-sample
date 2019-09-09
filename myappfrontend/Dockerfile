# Dockerfiel for myapp frontend runs on apache
FROM centos:7
MAINTAINER mohanraz@gmail.com
RUN yum -y update
RUN yum -y install httpd php php-gd php-mysql
ADD code /var/www/html
EXPOSE 80
ADD config /opt
RUN chmod 755 /opt/myenv
RUN /opt/myenv
ENV BACKENDLB=test
CMD ["httpd", "-D", "FOREGROUND"]