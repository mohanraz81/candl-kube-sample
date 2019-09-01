FROM amazonlinux:2
RUN yum -y update
RUN yum -y install awslogs
ADD config/awslogs.conf /etc/awslogs/awslogs.conf
CMD ["awslogsd"]