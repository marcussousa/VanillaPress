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
                    'wp-content/themes/vanilla/assets/js/components/affix.js',
                    'wp-content/themes/vanilla/assets/js/components/alert.js',
                    'wp-content/themes/vanilla/assets/js/components/button.js',
                    'wp-content/themes/vanilla/assets/js/components/carousel.js',
                    'wp-content/themes/vanilla/assets/js/components/collapse.js',
                    'wp-content/themes/vanilla/assets/js/components/dropdown.js',
                    'wp-content/themes/vanilla/assets/js/components/modal.js',
                    'wp-content/themes/vanilla/assets/js/components/tooltip.js',
                    'wp-content/themes/vanilla/assets/js/components/popover.js',
                    'wp-content/themes/vanilla/assets/js/components/scrollspy.js',
                    'wp-content/themes/vanilla/assets/js/components/tab.js',
                    'wp-content/themes/vanilla/assets/js/components/transition.js'
                ],
                dest: 'wp-content/themes/vanilla/assets/js/components.min.js'
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
                files: 'wp-content/themes/vanilla/assets/js/scripts.js',
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
