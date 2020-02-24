@servers(['web' => ['root@test.netemedia.fr']])

@task('deploy', ['on' => 'web'])
  cd /var/www/westeros/project/
  php7.4 artisan down
  git pull origin master
  php7.4 $(which composer) install
  php7.4 artisan migrate
  php7.4 artisan cache:clear
  php7.4 artisan up
@endtask
