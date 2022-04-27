import requests
import folium

res = requests.get('https://ipinfo.io')

data = res.json()

location = data['loc'].split(',')
lat = float(location[0])
long = float(location[1])
ip = data['ip']

print(lat)
print (long)

m = folium.Map(location=[lat, long], zoom_start = 15)

#Create Markers
folium.Marker([lat, long], popup=ip, tooltip=None).add_to(m)

m.save('map.html')
# Generate an HTML file to display map