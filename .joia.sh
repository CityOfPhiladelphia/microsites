# joia config

joia_install () {
  joia_ssh "scripts/install.sh"
}

joia_deploy () {
  joia_ssh "scripts/deploy.sh"
}
