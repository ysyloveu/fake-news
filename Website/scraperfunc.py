#!C:\Users\Alfred\AppData\Local\Programs\Python\Python37\python.exe
import sys

def main(url):
    import requests
    from bs4 import BeautifulSoup


# Request
    r1 = requests.get(url)
    r1.status_code

# We'll save in coverpage the cover page content
    coverpage = r1.content

# Soup creation
    soup = BeautifulSoup(coverpage, 'html5lib')

# News identification
    contents = soup.find_all('p')   
    print(len(contents))
#print(contents)
    for x in contents:
        print(x.get_text())
if __name__=='__main__':
    main(sys.argv[1])
