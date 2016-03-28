module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
		 	compass: {
	    	files: ['assets/sass/**/*.{scss,sass}'],
	    	tasks: ['compass']
	    },
		},
   	compass: {
      options: {
        sassDir: ['assets/sass'],
        cssDir: ['assets/stylesheets']
		  }
    },
    kss: {
      options: {
        css: '../assets/stylesheets/screen.css',
      },
      dist: {
        files: {
          'styleguide': ['assets/sass/']
        }
      }
    },
    // Lint Sass sources
    scsslint: {
      allFiles: [
          'assets/sass/*/*.scss'
        ],
      options: {
        config: 'config/scss-lint.yml',
        bundleExec: true
      }
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        eqnull: true,
        browser: true,
        globals: {
          jQuery: true
        },
      },
      all: ['Gruntfile.js', 'assets/javascript/**/*.js']
    }
  });

  // Load the plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-kss');
  grunt.loadNpmTasks('grunt-scss-lint');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  // Default task(s).
  grunt.registerTask('default', ['compass', 'watch']);
  grunt.registerTask('validate:sass', ['scsslint']);
  grunt.registerTask('validate:js', ['jshint']);
};
