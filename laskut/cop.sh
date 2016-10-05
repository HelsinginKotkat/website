chsum1=""
cd /var/www/html/laskut/
while true;  do
        chsum2=`find /var/www/html/laskut/ -type f -exec md5sum {} \;`
        if [ "$chsum1" != "$chsum2" ]; then
            aihe="$(ls -t /var/www/html/laskut/ | head -n1)";
            filu="$(ls -t /var/www/html/laskut/uploads/ | head -n1)";
            #body=cat $aihe;
            #cat "$aihe" | mail -s "Kansiossa muutoksia" -a "From: onni.lampi@heko.org" onni.lampi@aalto.fi
            clear
            echo "Aihe:";
            echo $aihe;
            echo "Viesti:";
            cat $aihe;
            echo "Tiedostonimi:";
            echo $filu;
	    #cd uploads/;
	    if [ $# -ne 1 ]
		then
	        echo "ei mailia";
	    else
		mutt -s "$aihe" onni.lampi@aalto.fi -a /var/www/html/laskut/uploads/$filu < $aihe;
		echo "mailia";
	    fi

	    #mutt -s "$aihe" onni.lampi@aalto.fi -a /var/www/html/laskut/uploads/$filu < $aihe;
            chsum1=$chsum2;
        fi
        sleep 2
done

