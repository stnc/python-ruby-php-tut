package db

import (
	"database/sql"
	"time"

	_ "github.com/go-sql-driver/mysql"
)

//StncSQL struct
type StncSQL struct {
	LastVersionNumber string
}

//LastVersion Veritabanındaki son versiyonu geri doner
func LastVersion() *StncSQL {
	db, err := sql.Open("mysql", "root:@/test?charset=utf8mb4,utf8")
	checkErr(err)
	//en son kaydeilen degeri geir
	rows, err := db.Query("SELECT id,version_number,version_name FROM versions where id=(select max(id) from versions )")
	checkErr(err)
	//var idsi int
	var versionVersionNumber string
	for rows.Next() {
		var id int
		var versionNumber string
		var versionName string
		rows.Scan(&id, &versionNumber, &versionName)
		versionVersionNumber = versionNumber
	}
	db.Close()
	return &StncSQL{
		LastVersionNumber: versionVersionNumber,
	}
}

//NewWriteSQLVersion ddd
func NewWriteSQLVersion(NewVersionNumberI string, NewVersionName string, NewPropertions string) {
	db, err := sql.Open("mysql", "root:@/test?charset=utf8")
	checkErr(err)

	// insert
	stmt, err := db.Prepare("INSERT versions SET version_number=?,version_name=?,version_date=?")
	checkErr(err)

	res, err := stmt.Exec(NewVersionNumberI, NewVersionName, time.Now())
	checkErr(err)

	id, err := res.LastInsertId()
	checkErr(err)

	stmt2, err := db.Prepare("INSERT versions_change SET version_id=?,new_propertions=?")
	checkErr(err)

	stmt2.Exec(id, NewPropertions)
	checkErr(err)

}

func checkErr(err error) {
	if err != nil {
		panic(err)
	}
}
