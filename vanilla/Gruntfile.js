module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        // define source files and their destinations
        uglify: {
            options: {
                compress: {
                    drop_console: true
                }
            },
            tests: {
                src: [
                    'assets/js/components/affix.js',
                    'assets/js/components/alert.js',
                    'assets/js/components/button.js',
                    'assets/js/components/carousel.js',
                    'assets/js/components/collapse.js',
                    'assets/js/components/dropdown.js',
                    'assets/js/components/modal.js',
                    'assets/js/components/tooltip.js',
                    'assets/js/components/popover.js',
                    'assets/js/components/scrollspy.js',
                    'assets/js/components/tab.js',
                    'assets/js/components/transition.js'
                ],
                dest: 'assets/js/components.min.js'
            }
        },

        // Sass/Css Path.
        files: {
            sassPath: 'sass/',
            compiledCssPath: 'assets/css/'
        },

        // Task configuration.
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    '<%= files.compiledCssPath %>styles.css': '<%= files.sassPath %>styles.scss'
                }
            }
        },

        watch: {
            scripts: {
                files: [
                    '<%= files.sassPath %>/**/*.scss'
                ],
                tasks: ['sass']
            },
            js: {
                files: 'assets/js/scripts.js',
                tasks: [ 'uglify' ]
            }
        }

    });

    // These plugins provide necessary tasks.
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Default task.
    grunt.registerTask('default', ['sass', 'uglify']);

};
