module.exports = (grunt) ->
  grunt.initConfig
    pkg: grunt.file.readJSON "package.json"

    meta:
      endpoint: 'web/'
      banner: """
        /* <%= pkg.name %> v<%= pkg.version %> - <%= grunt.template.today("m/d/yyyy") %>
           <%= pkg.homepage %>
           Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %> - Licensed <%= _.pluck(pkg.license, "type").join(", ") %> */

        """

    source:
      stylesheets: 'src/Resources/public/scss/'

    compass:
      dist: 
        options: 
          sassDir: "<%= source.stylesheets %>"
          cssDir:'<%= meta.endpoint %>css'     

    watch:
      stylesheets:
        files: ["<%= source.stylesheets %>*.scss"]
        tasks: ["compass"]

  grunt.loadNpmTasks "grunt-contrib-compass"
  grunt.loadNpmTasks "grunt-contrib-watch"


  grunt.registerTask "default", ["compass"]