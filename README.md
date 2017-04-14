# DBMSPhase3
Project: Kendrick and Liam

Change the necessary locations for accessing the database in all 4 files.
The PHP chain starts in main which has links to the other three php files.

The first section of main has the 5 queries for testing
For query number 2 please include the and between the two numbers.

The second section has the trigger creation process.  After clicking this link it should show zero results returned.

Third section is about testing the two triggers created in the previous section.

Rationale behind the triggers
1: It is important for our system to keep track of all changes to employees, since they should only be edited in specific situations. By adding a trigger on when the employee table is updated it allows us to keep track of all changes. All of the audits will store when the change was made, the name of the employee changed, their employee id, and then each audit will have its own ID if it needs to be searched quickly.

2: The rationale for the payment updating trigger is to make things a lot easier for someone entering a payment. This trigger makes changes to the FEE and FEE_PAYMENT tables to make sure they all update with the new payment. When a payment is made it will changed the amount owed within the corresponding fee number, and it adds a new entry into the FEE_PAYMENT table to show the link between the fee and the payment that was meant to pay off the fee or at least a portion of it.
