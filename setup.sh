sudo apt install gem ruby ruby-dev build-essential zlib1g-dev
sudo gem install bundler jekyll github-pages jekyll-paginate

cd website
bundle update
bundle exec jekyll build
bundle exec jekyll serve

