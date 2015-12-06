# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.33"
    config.vm.hostname = "scotchbox"

	config.hostsupdater.aliases = ["newsflow.dev"]
    
    # Optional NFS. Make sure to remove other synced_folder line too
    config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

	config.vm.provision "shell", path: "init-dev.sh"

	config.vm.provider :virtualbox do |vb|
		vb.gui = false
		vb.memory = 2048
    	vb.name = "Newsflow33"
	    vb.customize ['modifyvm', :id, '--natdnshostresolver1', 'on']
    	vb.customize ['modifyvm', :id, '--natdnsproxy1', 'on']
	end

end
