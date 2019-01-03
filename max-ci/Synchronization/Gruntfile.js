module.exports = function (grunt) {
    grunt.initConfig({
        csslint: {
            options: {
                absoluteFilePathsForFormatters: true,
                formatters: [
                    {id: 'junit-xml', dest: 'report/csslint_junit.xml'},
                    {id: 'csslint-xml', dest: 'report/csslint.xml'}
                ]
            },
            strict: {
                options: {
                    import: 2
                },
                src: ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/dev/*.css']
            }
        },
        uglify: {
            my_target: {
                files: {
                    'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/CHfw.min.js': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/dev/CHfw.js'],
                  
                    'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/CHfw-admin.min.js': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/dev/CHfw-admin.js'],
					  'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/CHfw-color-picker-init.min.js': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/dev/CHfw-color-picker-init.js'],
                   'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/CHfw-JQkit.min.js': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/dev/CHfw-JQkit.js'],
                    'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/CHfw-quickview.min.js': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/dev/CHfw-quickview.js'],
                    'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/CHfw-woocomerce.min.js': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/dev/CHfw-woocomerce.js'],
                }
            }
        },
        cssmin: {
            combine: {
                files: {
                    'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/CHfw-style.min.css': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/dev/CHfw-style.css'],
					 'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/CHfw-woocomerce.min.css': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/dev/CHfw-woocomerce.css'],
                    'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/CHfw-admin.min.css': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/dev/CHfw-admin.css'],
                    'D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/CHfw-tools.min.css': ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/dev/CHfw-tools.css'],
                  
                }
            }
        },
        // configure watch to auto update ----------------
        watch: {
            css: {
                files: ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/css/dev/*.css'],
                tasks: ['cssmin']
            },
            js: {
                files: ['D:/xampp/htdocs/nucleon.dev/wp-content/themes/nucleon/assets/js/dev/*.js'],
                tasks: ['uglify']
            }
        }

    });
    grunt.loadNpmTasks('grunt-contrib-csslint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('build', ['uglify', 'cssmin']);
	 //   grunt.registerTask('build', ['uglify', 'cssmin', 'watch']);

}
/*https://www.npmjs.com/package/gulp-image-optimization
cslint validotr yapar ama devre dışı şu an da 
 watch
 https://www.youtube.com/watch?v=qtP5xbwMcDQ
 https://scotch.io/tutorials/a-simple-guide-to-getting-started-with-grunt
 http://stackoverflow.com/questions/17585385/how-to-run-two-grunt-watch-tasks-simultaneously
 */
