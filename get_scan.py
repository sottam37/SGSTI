from scapy.all import ARP, Ether, srp

def scan(ip):
    # Criação do pacote ARP para descobrir dispositivos na rede
    arp_request = ARP(pdst=ip)
    ether = Ether(dst="ff:ff:ff:ff:ff:ff")
    packet = ether/arp_request

    # Envia o pacote e recebe a resposta
    result = srp(packet, timeout=3, verbose=0)[0]

    # Lista para armazenar os resultados
    devices = []

    # Processa os resultados
    for sent, received in result:
        devices.append({'ip': received.psrc, 'mac': received.hwsrc})

    return devices

def get_hostnames(ip_list):
    # Obtém o nome do host para cada endereço IP
    hostnames = {}
    for ip in ip_list:
        try:
            hostname, _, _ = socket.gethostbyaddr(ip['ip'])
            hostnames[ip['ip']] = hostname
        except socket.herror:
            hostnames[ip['ip']] = 'N/A'
    return hostnames

def main():
    target_ip = "192.168.100.0/24"  # Substitua pela sua faixa de rede

    print("Scanning devices on {target_ip}")
    
    devices = scan(target_ip)

    print("Devices found:")
    print("IP\t\t\tMAC Address\t\tHostname")
    
    for device in devices:
        print("{device['ip']}\t{device['mac']}\t{get_hostnames([device])[device['ip']]}")

if __name__ == "__main__":
    import socket

    main()
