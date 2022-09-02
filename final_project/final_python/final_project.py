import time
import re
import numpy as np
import requests
from bs4 import BeautifulSoup
from selenium import webdriver
import pandas as pd
import matplotlib.pyplot as plt
import mysql.connector
import pymysql


HEADERS = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64 ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36'
}

driverPath = r'C:\Users\win88\PycharmProjects\newpython\Lib\site-packages\chromedriver.exe'
driver = webdriver.Chrome(driverPath)
url = 'https://www.ca.ntpc.gov.tw/home.jsp?id=a5688376c95574b4'
driver.get(url)
time.sleep(2)

# year from 16 year=26 range(1,8)
tmp = 12
flag = 6
while(tmp):
    for city_month in range(flag,13):
        element = driver.find_element_by_id('areaid')
        all_options = element.find_elements_by_tag_name("option")
        # city_num = int(input('請輸入數字0-28'))
        city_num = 28
        all_options[city_num].click()
        element1 = driver.find_element_by_id('yyyy')
        all_options = element1.find_elements_by_tag_name("option")
        # city_year = int(input('請輸入數字5-26'))
        city_year = 26
        all_options[city_year].click()
        element2 = driver.find_element_by_id('mm')
        all_options = element2.find_elements_by_tag_name("option")
        # city_month = int(input('請輸入數字1-12'))
        all_options[city_month].click()
        button = driver.find_element_by_css_selector("input[onclick*='qry()']")
        button.click()
        html = driver.page_source
        soup = BeautifulSoup(html, 'html.parser')
        pin = soup.find_all('tbody')
        # print(pin)
        boys = []
        girls = []
        for i in pin:
            ans1 = re.findall('<td data-th="年齡">(\d.*)歲.*</td>', str(i))
            boy = i.find_all('td', {'data-th': '男'})
            girl = i.find_all('td', {'data-th': '女'})
        # print(ans1)
        for j in range(len(ans1)):
            boys.append(boy[j].text)
            girls.append(girl[j].text)
        # print(boys)
        # print(girls)
        for m in range(len(boys)):
            boys[m] = boys[m].replace(',', '')
            girls[m] = girls[m].replace(',', '')
        # print(boys)
        # print(girls)
        b0_10=b11_20=b21_30=b31_40=b41_50=b51_60=b61_70=b71_80=b81_90=b91_100 = 0
        g0_10=g11_20=g21_30=g31_40=g41_50=g51_60=g61_70=g71_80=g81_90=g91_100 = 0
        b = []
        g = []
        for k in range(len(boys)):
            if k >= 0 and k <= 10:
                b0_10 = b0_10 + int(boys[k])
                g0_10 = g0_10 + int(girls[k])
            elif k >= 11 and k <= 20:
                b11_20 = b11_20 + int(boys[k])
                g11_20 = g11_20 + int(girls[k])
            elif k >= 21 and k <= 30:
                b21_30 = b21_30 + int(boys[k])
                g21_30 = g21_30 + int(girls[k])
            elif k >= 31 and k <= 40:
                b31_40 = b31_40 + int(boys[k])
                g31_40 = g31_40 + int(girls[k])
            elif k >= 41 and k <= 50:
                b41_50 = b41_50 + int(boys[k])
                g41_50 = g41_50 + int(girls[k])
            elif k >= 51 and k <= 60:
                b51_60 = b51_60 + int(boys[k])
                g51_60 = g51_60 + int(girls[k])
            elif k >= 61 and k <= 70:
                b61_70 = b61_70 + int(boys[k])
                g61_70 = g61_70 + int(girls[k])
            elif k >= 71 and k <= 80:
                b71_80 = b71_80 + int(boys[k])
                g71_80 = g71_80 + int(girls[k])
            elif k >= 81 and k <= 90:
                b81_90 = b81_90 + int(boys[k])
                g81_90 = g81_90 + int(girls[k])
            else:
                b91_100 = b91_100 + int(boys[k])
                g91_100 = g91_100 + int(girls[k])
        b.append(b0_10)
        g.append(g0_10)
        b.append(b11_20)
        g.append(g11_20)
        b.append(b21_30)
        g.append(g21_30)
        b.append(b31_40)
        g.append(g31_40)
        b.append(b41_50)
        g.append(g41_50)
        b.append(b51_60)
        g.append(g51_60)
        b.append(b61_70)
        g.append(g61_70)
        b.append(b71_80)
        g.append(g71_80)
        b.append(b81_90)
        g.append(g81_90)
        b.append(b91_100)
        g.append(g91_100)
        # print(b)
        # print(g)
        if b[0]==0 and g[0]==0:
            print('error')
            flag = city_month
            break
        tmp1 = city_year + 85
        tmp2 = city_num + 1
        myconn = pymysql.connect(host='localhost', port=3306, user='root', passwd='', db='final')
        mycursor = myconn.cursor()
        sql2 = "select year,month,city_id from p_numbers"
        mycursor.execute(sql2)
        data = mycursor.fetchall()
        #print(data)
        if len(data) == 0:
            sql1 = "INSERT INTO p_numbers (age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100,gender,year,month,city_id) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
            val = [
                (b0_10, b11_20, b21_30, b31_40, b41_50, b51_60, b61_70, b71_80, b81_90, b91_100, 1, city_year + 85,city_month,city_num + 1),
                (g0_10, g11_20, g21_30, g31_40, g41_50, g51_60, g61_70, g71_80, g81_90, g91_100, 2, city_year + 85,city_month,city_num + 1)
            ]
            try:
                mycursor.executemany(sql1, val)
                myconn.commit()
            except:
                myconn.rollback()
        else:
            for x in data:
                if x[0] is not city_year + 85 or x[1] is not city_month or x[2] is not city_num + 1:
                    print('ok')
                    sql1 = "INSERT INTO p_numbers (age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100,gender,year,month,city_id) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
                    val = [
                        (b0_10, b11_20, b21_30, b31_40, b41_50, b51_60, b61_70, b71_80, b81_90, b91_100, 1, city_year + 85,city_month, city_num + 1),
                        (g0_10, g11_20, g21_30, g31_40, g41_50, g51_60, g61_70, g71_80, g81_90, g91_100, 2, city_year + 85,city_month, city_num + 1)
                    ]
                    try:
                        mycursor.executemany(sql1, val)
                        myconn.commit()
                    except:
                        myconn.rollback()

                    print(mycursor.rowcount, "record inserted.")
                    tmp = tmp-1
                    print(city_month)
                    break
                else:
                    print('no')
        time.sleep(10)



# arr = [b,g]
# d1 = pd.DataFrame(arr,columns=['0-10','11-20','21-30','31-40','41-50','51-60','61-70','71-80','81-90','91up'],index=['Male','Female'])
# print(d1)
# # d1.plot(kind='bar',title='Bar chart')
# d1.plot.bar(rot=0)
# plt.show()

