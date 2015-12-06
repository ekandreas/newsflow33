#!/bin/bash

echo "Updating mysql configs in /etc/mysql/my.cnf."
sudo sed -i "s/bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
echo "Updated mysql bind address in /etc/mysql/my.cnf to 0.0.0.0 to allow external connections."

echo "Assigning mysql user user1 access on %."
sudo mysql -u root -proot --execute "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root'; FLUSH PRIVILEGES;"
echo "Assigned mysql user user1 access on all hosts."

sudo service mysql stop
sudo service mysql start

sudo mysql -u root -proot --execute "CREATE DATABASE newsflow;"

cd ~
echo "Adding java to the box"
sudo apt-get install python-software-properties -y
sleep 1
sudo add-apt-repository ppa:webupd8team/java -y
sleep 1
sudo apt-get update
sleep 1
echo "oracle-java8-installer shared/accepted-oracle-license-v1-1 select true" | sudo debconf-set-selections
sudo apt-get install -y oracle-java8-installer

echo "Getting Elasticsearch repo"
wget -qO - https://packages.elastic.co/GPG-KEY-elasticsearch | sudo apt-key add -
echo "deb http://packages.elastic.co/elasticsearch/2.x/debian stable main" | sudo tee -a /etc/apt/sources.list.d/elasticsearch-2.x.list
echo "Installing Elasticsearch..."
sudo apt-get update && sudo apt-get install elasticsearch -y
sudo update-rc.d elasticsearch defaults 95 10
sudo service elasticsearch start
sleep 5
curl http://localhost:9200
