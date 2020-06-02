import sys

def main(url):
    import requests
    from bs4 import BeautifulSoup

    r1 = requests.get(url)
    r1.status_code

    coverpage = r1.content
    soup = BeautifulSoup(coverpage, 'html5lib')
    contents = soup.find_all('p') 

    for x in contents:
        print(x.get_text())
if __name__=='__main__':
    main(sys.argv[1])