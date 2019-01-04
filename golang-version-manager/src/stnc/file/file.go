package fileOperations

import (
	"archive/zip"
	"bufio"
	"bytes"
	"errors"
	"fmt"
	"io"
	"io/ioutil"
	"os"
	"path/filepath"
	"stnc/db"
	"strings"

	"github.com/fatih/color"
)

//StncVersiyonInfo bla bla
type StncVersiyonInfo struct {
	LastVersionNumber string
	NewVersionNumber  string
	NewVersionName    string
	NewPropertions    string
}

//StncInputsNewPropertions bla bla
func StncInputsNewPropertions() string {

	red := color.New(color.FgRed)
	boldRed := red.Add(color.Bold)
	boldRed.Println("Merhaba bu versiyonda yaptığınız değişiklikleri girebilirsiniz ?")
	reader := bufio.NewReader(os.Stdin)
	text, _ := reader.ReadString('\n')
	return text
}

//StncInputsVersiyonName bla bla
func StncInputsVersiyonName() string {
	red := color.New(color.FgRed)
	boldRed := red.Add(color.Bold)
	boldRed.Println("Merhaba versiyon ismini giriniz,boş bırakmak için Enter a basınız")
	reader := bufio.NewReader(os.Stdin)
	text, _ := reader.ReadString('\n')
	return text
}

//StncInformation bla bla
func StncInformation(NewVersionNumberI string) *StncVersiyonInfo {
	c := color.New(color.FgCyan).Add(color.Underline)
	d := color.New(color.FgCyan, color.Bold)
	d.Printf(cizdir(5, "*"))
	c.Printf("Merhaba VERSION yönetim yazılımına hoşgeldiniz")
	d.Println(cizdir(5, "*"))

	LastVersionNumber := db.LastVersion()
	d.Printf(cizdir(5, "--"))
	c.Printf("En son kullandığınız versiyon " + LastVersionNumber.LastVersionNumber)
	d.Println(cizdir(5, "--"))
	NewVersionName := StncInputsVersiyonName()
	NewPropertions := StncInputsNewPropertions()

	return &StncVersiyonInfo{
		LastVersionNumber: LastVersionNumber.LastVersionNumber,
		NewPropertions:    NewPropertions,
		NewVersionName:    NewVersionName,
		NewVersionNumber:  NewVersionNumberI,
	}

}

//SQLislemleri bla bla
//sql işlemlerini buradan yapıyorum ama burası aslında öğrenme amaçlı
//https://www.golang-book.com/books/intro/9
func SQLislemleri(s *StncVersiyonInfo) string {
	db.NewWriteSQLVersion(s.NewVersionNumber, s.NewVersionName, s.NewPropertions)
	return "kaydedildi"
}

//DosyaVersionBilgisiOlustur bu kısım versiyon.php dosyası içine versiyon atma gorevini yerine getirir
func DosyaVersionBilgisiOlustur(s *StncVersiyonInfo) string {
	fileWriteExtrasPlugin(s.NewVersionNumber)
	fileWriteStaffPlugin(s.NewVersionNumber)
	fileWriteMypluginPlugin(s.NewVersionNumber)
	copyFolder("D:/xampp/htdocs/wow.dev/wp-content/plugins/CHfw-staff", "E:/go_prj/selman_onemli/CHfw-staff")
	copyFolder("D:/xampp/htdocs/wow.dev/wp-content/plugins/CHfw-extras", "E:/go_prj/selman_onemli/CHfw-extras")
	fileWriteExtrasPlugin(s.NewVersionNumber)
	fileWriteStaffPlugin(s.NewVersionNumber)
	fileWriteMypluginPlugin(s.NewVersionNumber)

	zipit("CHfw-staff", "versions/CHfw-staff"+s.NewVersionNumber+".zip")
	zipit("CHfw-extras", "versions/CHfw-extras"+s.NewVersionNumber+".zip")
	err := Copy("D:/xampp/htdocs/wow.dev/wp-content/themes/wow/includes/plugins/install/CHfw-extras"+s.NewVersionNumber+".zip", "versions/CHfw-extras"+s.NewVersionNumber+".zip")
	Copy("D:/xampp/htdocs/wow.dev/wp-content/themes/wow/includes/plugins/install/CHfw-staff"+s.NewVersionNumber+".zip", "versions/CHfw-staff"+s.NewVersionNumber+".zip")
	Copy("D:/xampp/htdocs/wow.dev/wp-content/themes/wow/includes/plugins/tgmpa/my_plugin.php", "versions/my_plugin.php")
	deleteFile("D:/xampp/htdocs/wow.dev/wp-content/themes/wow/includes/plugins/install/CHfw-extras" + s.LastVersionNumber + ".zip")
	deleteFile("D:/xampp/htdocs/wow.dev/wp-content/themes/wow/includes/plugins/install/CHfw-staff" + s.LastVersionNumber + ".zip")
	//Copy("src/", "versions/CHfw-extras"+s.NewVersionNumber+".zip")
	if err != nil {
		fmt.Println(err)
	}
	return "kaydedildi"
}

//copy_folder klasoru kopyalar
func copyFolder(source string, dest string) (err error) {

	sourceinfo, err := os.Stat(source)
	if err != nil {
		return err
	}

	err = os.MkdirAll(dest, sourceinfo.Mode())
	if err != nil {
		return err
	}

	directory, _ := os.Open(source)

	objects, err := directory.Readdir(-1)

	for _, obj := range objects {

		sourcefilepointer := source + "/" + obj.Name()

		destinationfilepointer := dest + "/" + obj.Name()

		if obj.IsDir() {
			err = copyFolder(sourcefilepointer, destinationfilepointer)
			if err != nil {
				fmt.Println(err)
			}
		} else {
			err = copy_file(sourcefilepointer, destinationfilepointer)
			if err != nil {
				fmt.Println(err)
			}
		}

	}
	return
}
func copy_file(source string, dest string) (err error) {
	sourcefile, err := os.Open(source)
	if err != nil {
		return err
	}

	defer sourcefile.Close()

	destfile, err := os.Create(dest)
	if err != nil {
		return err
	}

	defer destfile.Close()

	_, err = io.Copy(destfile, sourcefile)
	if err == nil {
		sourceinfo, err := os.Stat(source)
		if err != nil {
			err = os.Chmod(dest, sourceinfo.Mode())
		}

	}

	return
}

func deleteFile(path string) {
	// delete file
	var err = os.Remove(path)
	if err != nil {
		fmt.Println(err)
	} else {
		fmt.Println(" done deleting file ==> " + path)
	}
}

//Copy dosya kopyalamak için
func Copy(dst, src string) error {
	in, err := os.Open(src)
	if err != nil {
		return err
	}
	defer in.Close()
	out, err := os.Create(dst)
	if err != nil {
		return err
	}
	defer out.Close()
	_, err = io.Copy(out, in)
	cerr := out.Close()
	if err != nil {
		return err
	}
	return cerr
}

/*
belli bir sayıda karakter donmesini sağlar
uses
cizdir(5, "-") //5 adet  "-" karakteri dönder dedik
return
-----
*/
func cizdir(n int, value string) string {
	var is string
	for i := 0; i < n; i++ {
		is += value
	}
	return is
}

//FileWrite bla
func fileWriteExtrasPlugin(NewVersionNumber string) {
	// Test file
	filename := `E:/go_prj/selman_onemli/CHfw-extras/CHfw-extras.php`
	// Create test file
	lcase := []byte(`<?php
/*
Plugin Name: Chrom Themes Extras
Plugin URI:
Description: Theme Extras and shortcode library
Version:  ` + NewVersionNumber + `
Author: Chrom Themes
Text Domain: CHfw-extras
Domain Path: /languages/
*/
include ('CHfw-extras_file.php');
register_activation_hook(__FILE__, 'CHfw_extras_activate');
add_action('admin_init', 'CHfw_extras_redirect');

function CHfw_extras_activate() {
  add_option('CHfw_extras_do_activation_redirect', true);
}

function CHfw_extras_redirect() {
  if (get_option('CHfw_extras_do_activation_redirect', false)) {
    delete_option('CHfw_extras_do_activation_redirect');
     wp_redirect(admin_url("admin.php?page=pt-one-click-demo-import"));
    exit;
 }
}
`)
	perm := os.FileMode(0644)
	err := ioutil.WriteFile(filename, lcase, perm)
	if err != nil {
		fmt.Println(err)
		return
	}
}

//fileWriteStaffPlugins bla
func fileWriteStaffPlugin(NewVersionNumber string) {
	// Test file
	filename := `E:/go_prj/selman_onemli/CHfw-staff/CHfw-staff.php`
	// Create test file
	lcase := []byte("<?php\r\n/*\r\nPlugin Name:Chrom Themes Staff\r\nPlugin URI:			\r\nDescription: Staff Members plugin for the Nucleon theme.	\r\nVersion: " + NewVersionNumber + "\r\nAuthor: Chrom Themes\r\nText Domain: CHfw-staff\r\nDomain Path: /languages/\r\n*/ \r\ninclude ('CHfw-staff_file.php');")
	perm := os.FileMode(0644)
	err := ioutil.WriteFile(filename, lcase, perm)
	if err != nil {
		fmt.Println(err)
		return
	}
}

//fileWriteMypluginPlugin bla
func fileWriteMypluginPlugin(NewVersionNumber string) {
	// Test file
	filename := `versions\my_plugin.php`
	// Create test file
	lcase := []byte(`
		<?php
		$My_plugins = array(
			array(
				'name'               => esc_html__( 'Chrom Themes Staff','chfw-lang'),
				'slug'               => 'CHfw-staff',
				'source'             => CHfw_PLUGIN_DIR . '/install/CHfw-staff` + NewVersionNumber + `.zip',
				'required'           => true,
				'version'            => '` + NewVersionNumber + `',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
			array(
				'name'               => esc_html__( 'Chrom Themes Extras','chfw-lang'),
				'slug'               => 'CHfw-extras',
				'source'             => CHfw_PLUGIN_DIR . '/install/CHfw-extras` + NewVersionNumber + `.zip',
				'required'           => true,
				'version'            => '` + NewVersionNumber + `',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
		);
		`)
	perm := os.FileMode(0644)
	err := ioutil.WriteFile(filename, lcase, perm)
	if err != nil {
		fmt.Println(err)
		return
	}
}

//UpdateWord dosyayı günceller
func UpdateWord(filename string, data, word []byte) (int, error) {
	n := 0
	f, err := os.OpenFile(filename, os.O_WRONLY, 0644)
	if err != nil {
		return n, err
	}
	uWord := bytes.ToUpper(word)
	if len(word) < len(uWord) {
		err := errors.New("Upper case longer than lower case:" + string(word))
		return n, err
	}

	if len(word) > len(uWord) {
		uWord = append(uWord, bytes.Repeat([]byte{' '}, len(word))...)[:len(word)]
	}
	off := int64(0)
	for {
		i := bytes.Index(data[off:], word)
		if i < 0 {
			break
		}
		off += int64(i)
		_, err = f.WriteAt(uWord, off)
		if err != nil {
			return n, err
		}
		n++
		off += int64(len(word))
	}
	f.Close()
	if err != nil {
		return n, err
	}
	return n, nil
}

//updateWrite dosyaya ekleme yapar
func updateWrite() {
	filename := `ltoucase.txt`
	// Update word in test file
	// Read test file
	data, err := ioutil.ReadFile(filename)
	if err != nil {
		fmt.Println(err)
		return
	}
	fmt.Println(string(data))
	word := []byte("update")
	n, err := UpdateWord(filename, data, word)
	if err != nil {
		fmt.Println(n, err)
		return
	}
	fmt.Println(filename, string(word), n)
	data, err = ioutil.ReadFile(filename)
	if err != nil {
		fmt.Println(err)
		return
	}
	fmt.Println(string(data))
}

/*ZİP İŞleMLERİ */
//unzip zip dosyasını açmak içindir
func unzip(archive, target string) error {
	reader, err := zip.OpenReader(archive)
	if err != nil {
		return err
	}

	if err := os.MkdirAll(target, 0755); err != nil {
		return err
	}

	for _, file := range reader.File {
		path := filepath.Join(target, file.Name)
		if file.FileInfo().IsDir() {
			os.MkdirAll(path, file.Mode())
			continue
		}

		fileReader, err := file.Open()
		if err != nil {
			return err
		}
		defer fileReader.Close()

		targetFile, err := os.OpenFile(path, os.O_WRONLY|os.O_CREATE|os.O_TRUNC, file.Mode())
		if err != nil {
			return err
		}
		defer targetFile.Close()

		if _, err := io.Copy(targetFile, fileReader); err != nil {
			return err
		}
	}

	return nil
}

//zipit zip dosyası oluşturur
func zipit(source, target string) error {
	zipfile, err := os.Create(target)
	if err != nil {
		return err
	}
	defer zipfile.Close()

	archive := zip.NewWriter(zipfile)
	defer archive.Close()

	info, err := os.Stat(source)
	if err != nil {
		return nil
	}

	var baseDir string
	if info.IsDir() {
		baseDir = filepath.Base(source)
	}

	filepath.Walk(source, func(path string, info os.FileInfo, err error) error {
		if err != nil {
			return err
		}

		header, err := zip.FileInfoHeader(info)
		if err != nil {
			return err
		}

		if baseDir != "" {
			header.Name = filepath.Join(baseDir, strings.TrimPrefix(path, source))
		}

		if info.IsDir() {
			header.Name += "/"
		} else {
			header.Method = zip.Deflate
		}

		writer, err := archive.CreateHeader(header)
		if err != nil {
			return err
		}

		if info.IsDir() {
			return nil
		}

		file, err := os.Open(path)
		if err != nil {
			return err
		}
		defer file.Close()
		_, err = io.Copy(writer, file)
		return err
	})

	return err
}

func checkErr(err error) {
	if err != nil {
		panic(err)
	}
}
