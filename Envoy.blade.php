@servers(['bastion' => ['netadm@10.8.0.1 -p 2222']])

@setup
  $project = "Westeros";
  $server = 'box';
  $app_dir = '/data/web/westeros/htdocs/project';
  $php = 'php7.4';
  $ssh_server = "netadm@{$server}";
  $user = strpos(strtolower(php_uname()), 'windows') !== false ? ucwords(getenv('USERNAME')) : ucwords(posix_getpwuid(posix_geteuid())['name']);
@endsetup

@task('deploy', ['on' => 'bastion'])
  echo "Start deploy on {{ $server }}..."
  ssh {{ $ssh_server }} -T -p 2222
  cd {{ $app_dir }}
  php7.4 artisan down
  git pull origin master
  php7.4 $(which composer) install
  php7.4 artisan migrate
  php7.4 artisan cache:clear
  php7.4 artisan up
  echo "Deploy finished !"
@endtask

@after
  @discord('https://discordapp.com/api/webhooks/686968726561751158/jJLkvQYTPXY_TgXocH0jwJ5G-3TtNgyXs2ZXG0TKztHnUiVwupARlHzeT_OwYURClmj2', "**{$user}** a déployé le projet **{$project}** sur le serveur **{$server}**")
@endafter

