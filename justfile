default:
  @just --list

# Update PHP and Node stuff
update:
  composer update
  npm update
  npm outdated
