for i in {1..5}; do
  convert "teaser$i.jpg" -resize 256x256^ -gravity center -extent 256x256 "t$i.jpg"
done
