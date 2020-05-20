Vagrant.configure("2") do |config|
    config.vm.box = "hashicorp/bionic64"

    config.vm.provision :shell, path: "provisioning/apache.sh"
    config.vm.provision :shell, path: "provisioning/php.sh"
end