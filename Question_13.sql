/**
 *  Question 13:
 * Using your codetest table, demonstrate a the My SQL query that provides;
 *
 * 1) The highest close price during the whole period, and date.
 * 2) Which month of the year had the largest volatility between prices.
 * 3) Your ROI (%) at the last known close price if you had of bought exactly
 *    $100,000 worth of Tesla stocks on the 3rd of July 2017.
 */

USE codetest;

# 1.
SELECT `Date`, MAX(`ClosePrice`)
FROM codetest;

# 2. Volatility defined as https://www.investopedia.com/terms/v/volatility.asp
SELECT DATE_FORMAT(`DATE`, '%Y-%m') AS Year_Month_With_Highest_Volatility
FROM codetest
GROUP BY MONTH(`Date`)
ORDER BY STD(`ClosePrice`) DESC
LIMIT 1;

select `ClosePrice` from codetest order by `Date` DESC limit 1;

# 3. $100000 purchased on the 17/07/2017 and sold on the last day of data ROI.
SELECT (((SELECT (100000 / `ClosePrice`)
          FROM codetest
          WHERE `Date` = '2017-07-17 00:00:00') * `ClosePrice`
            ) - 100000) /
       100000 * 100 AS `Close Value %`
FROM codetest
ORDER BY `Date` DESC
LIMIT 1;