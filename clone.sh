cd "$( dirname "${BASH_SOURCE[0]}" )"

# Download wordpress
wget http://wordpress.org/latest.tar.gz
tar -xf latest.tar.gz
rm latest.tar.gz

# Copy existing config
cp wp-config.php wordpress
cp htaccess.conf wordpress/.htaccess

# Download plugins
cd wordpress/wp-content/plugins

for plugin in `cat ../../../plugins.txt`
do
    echo Downloading ${plugin}
    wget "http://downloads.wordpress.org/plugin/${plugin}.zip"

    echo Unpackaging ${plugin}
    unzip "${plugin}.zip"
    rm "${plugin}.zip"
done

# clone from wpro git repo
git clone https://github.com/webngay/wpro -b custom-datastor

# back to root dir
cd "$( dirname "${BASH_SOURCE[0]}" )"

# clone the theme
cd wordpress/wp-content/themes
git clone https://github.com/webngay/gardening_theme_wp_8
