# .bash_profile

# Get the aliases and functions
if [ -f ~/.bashrc ]; then
        . ~/.bashrc
fi

# User specific environment and startup programs

PATH=$PATH:$HOME/.local/bin:$HOME/bin

export PATH

alias phpunit="cd /sandbox; /sandbox/vendor/bin/phpunit"
alias phpunit-coverage="cd /sandbox; /sandbox/vendor/bin/phpunit --coverage-html /sandbox/docs"

cd /sandbox