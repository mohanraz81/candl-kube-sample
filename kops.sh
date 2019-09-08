BUCKET=$1
DOMAIN=$2
curl -LO https://github.com/kubernetes/kops/releases/download/$(curl -s https://api.github.com/repos/kubernetes/kops/releases/latest | grep tag_name | cut -d '"' -f 4)/kops-linux-amd64
chmod +x kops-linux-amd64
sudo mv kops-linux-amd64 /usr/local/bin/kops
wget -O kubectl https://storage.googleapis.com/kubernetes-release/release/v1.8.1/bin/linux/amd64/kubectl
chmod +x ./kubectl
sudo mv ./kubectl /usr/local/bin/kubectl
aws s3api create-bucket --bucket $BUCKET  --region us-east-1
aws s3api put-bucket-versioning --bucket $BUCKET  --versioning-configuration Status=Enabled
echo "export KOPS_STATE_STORE=s3://$BUCKET" >> ~/.bash_profile
echo "export NAME=kubecluster.$DOMAIN" >> ~/.bash_profile
 ssh-keygen
 kops create cluster \
    --zones=us-east-1a,us-east-1b,us-east-1c \
    --master-zones=us-east-1a,us-east-1b,us-east-1c \
    --node-count=4 \
    --node-size=t2.small \
    --master-size=t2.small \
    --authorization RBAC \
    --name ${NAME} --yes
sleep 300
kops validate cluster
 
