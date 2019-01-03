__author__ = 'pythontab.com'
# Import pymysql package
import pymysql
import pymysql.cursors
"""
try:
    # Get a database connection, note if it is UTF-8Type, need to develop a database
    db = pymysql.connect(host='127.0.0.1', user='root', passwd='', db='ideal.com.tr', port=3306,
                          charset='utf8')

   # db = pymysql.connect("localhost", "root", "", "ideal.com.tr")

    cur = db1.cursor()  # Get a cursor
    cur.execute('select id,name,status from python_test')
    data = cur.fetchall()
    for row in data:
        # Note that the int type requires the use of STR function to escape
        print("ID: "        '   name: '         "  status: "  )
       # print( str(row[0])+ '    ' + row[1] +'                 '+  row[2])
        print ("%s, %s" % (row[0], row[1]))

    cur.close()  # Close the cursor
    db1.close()  # Release database resources
except  Exception:
    print("Query failed ")

s = "*";
seq = ("a", "b", "c"); # This is sequence of strings.
print (s.join( seq ))
"""
class stnc_db:

    def __init__(self):
        self.db=pymysql.connect(host='127.0.0.1', user='root', passwd='', db='ideal.com.tr', port=3306,
                          charset='utf8')
        #cursor = self.db.cursor(cursorclass=pymysql.cursors.DictCursor)

    def query(self,sql):
        cur = self.db.cursor()
        cur.execute(sql)
        data = cur.fetchall()
        for row in data:
            # Note that the int type requires the use of STR function to escaper
            print("ID: "        '   name: '         "  status: ")
            # print( str(row[0])+ '    ' + row[1] +'                 '+  row[2])
            print("%s, %s" % (row[0], row[1]))

        cur.close()  # Close the cursor
        self.db.close()  # Release database resources

database=stnc_db()
database.query('select id,name,status from python_test')

