package main
//http://marcio.io/2015/07/handling-1-million-requests-per-minute-with-golang/
import (
	"database/sql"
	"fmt"
	_ "github.com/go-sql-driver/mysql"
	"regexp"
	"golang.org/x/text/encoding/charmap"
	"sync"
	"net/http"
	"io/ioutil"
	 "strings"
)

func main() {
	Icerik_InitM()
}
func checkErr_This(err error) {
	if err != nil {
		panic(err)
		fmt.Println(err)
	}
}
func Icerik_InitM() {
	db, err := sql.Open("mysql", "root:cansum123@/crawler?charset=utf8mb4,utf8")
	checkErr_This(err)
	//	rows, err := db.Query("SELECT id,site_linki,sayfa_sayisi FROM ist_firma_rehber_kategorileri WHERE id BETWEEN 34 AND 399;")
//	rows, err := db.Query("SELECT id,site_linki FROM `ist_firma_rehber_kategori_sayfalar`  where  status=0 and id  BETWEEN 10000 AND 12000; ")
	rows, err := db.Query("SELECT id,site_linki FROM `ist_firma_rehber_kategori_sayfalar`  where  status=0 limit 30 ")
	checkErr_This(err)
	urlss:=make(map[int]string)
	for rows.Next() {
		var id int
		var site_linki string

		rows.Scan( &id,&site_linki)
		urlss[id] = site_linki
		url_gezici_MultipleM(urlss ,  db )
	}
//fmt.Println(urlss)
	db.Close()
}



func url_gezici_MultipleM(urls(map[int]string),   db *sql.DB) {


	var wg sync.WaitGroup
	wg.Add(len(urls))
	for _, url := range urls {
		//fmt.Println("Key:", keyID, "Value:", url)
		go func(url string) {
			defer wg.Done()
			response, err := http.Get(url)
			if err != nil {
				// error handling
			}
			 // fmt.Printf("%s: %s\n",url,response.Status)
			// fmt.Println(response.Status)
		//	 if response.Status=="200 OK"{
				 defer response.Body.Close()
				 body, err := ioutil.ReadAll(response.Body)
				 checkErr_ThisM(err)
				  regex_finderM(string(body),url,  db)
		//	 }

		}(url)
	}
	wg.Wait() // waits until the url checks complete
	fmt.Print(urls)
}

func regex_finderM( str string,url string,db *sql.DB){
	var re = regexp.MustCompile(`(?mis)<table border="0" width="414" cellspacing="0" cellpadding="0" style="font-family: Trebuchet MS; font-size: 13px;">(.*?)<\/table>`)
	for _, match := range re.FindAllString(str, -1) {
		//fmt.Println(match, "found at index", i)
		icerik , err :=charmap.ISO8859_9.NewDecoder().String(match)
		checkErr_ThisM(err)
	//	fmt.Println(r)
		UpdateSQLM(icerik,url , db) //burda struct a vermem gerek ama nasıl yaparım
	}
}

func UpdateSQLM(icerik string,url string, db *sql.DB) {
//	stmt, err := db.Prepare("UPDATE ist_firma_rehber_kategori_sayfalar_test_data SET icerik=?, status=1 where id=? ")
	stmt, err := db.Prepare("UPDATE ist_firma_rehber_kategori_sayfalar SET icerik=?, status=1  WHERE `site_linki` = ?  ")
	  icerik = strings.Replace(icerik, "'", "_", -1)
	checkErr_ThisM(err)
	res, err := stmt.Exec(icerik,url)
	checkErr_ThisM(err)
	fmt.Print(res)
}


func checkErr_ThisM(err error) {
	if err != nil {
		panic(err)
		fmt.Println(err)
	}
}


/*NOT USED */
/*

func url_gezici_SingleM(url string,  db *sql.DB) {

	resp, err := http.Get(url)
	if err != nil {
		// handle error
	}
	defer resp.Body.Close()
	body, err := ioutil.ReadAll(resp.Body)
	regex_finderM(string(body),db )

}

*/