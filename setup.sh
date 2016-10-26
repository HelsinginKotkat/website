echo "This is a script to automate installation of this website. After running this script you should have a somewhat working version running locally. Please note that things that refer to a specific domain will not work."

sudo apt install gem ruby ruby-dev build-essential zlib1g-dev
sudo gem install bundler jekyll

cd website
bundle update
bundle exec jekyll build
bundle exec jekyll serve

