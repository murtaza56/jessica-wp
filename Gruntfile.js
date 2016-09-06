module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		/**
		* Sass Task
		*/
		sass: {
			dev: {
				options: {
					style: 'compact',
					sourcemap: 'none',
				},
				files: {
					'compiled/style-compact.css': 'scss/style.scss'
				}
			},
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none',
				},
				files: {
					'compiled/style.css': 'scss/style.scss'
				}
			}
		},
		/**
		* Compile JS files
		*/
	    concat: {
	      options: {
	        stripBanners: true
	      },
	      js : {
	        files: {
	          'compiled/base.js':
	          [
	            'js/*.js',
	          ]
	        }
	      }
	    },
		/**
		* Minify compiled JS file
		*/
	    uglify : {
	      js: {
	        files: {
	          'compiled/base.min.js': ['compiled/base.js'],
	        }
	      }
	    },
		/**
		* Autoprefixer
		*/
		autoprefixer: {
			options: {
				browsers: ['last 2 versions']
			},
			// prefix all files
			multiple_files: {
				expand: true,
				flatten: true,
				src: 'compiled/*.css',
				dest: '',
			}
		},
		/**
		* Watch Task
		*/
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'autoprefixer']
			},
			js: {
				files: 'js/*.js',
				tasks: ['concat', 'uglify']
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.registerTask('default', ['watch']);
}
