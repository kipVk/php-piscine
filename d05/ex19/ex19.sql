SELECT DATEDIFF(MAX(DATE(`date`)), MIN(DATE(`date`))) AS uptime
	FROM member_history
;