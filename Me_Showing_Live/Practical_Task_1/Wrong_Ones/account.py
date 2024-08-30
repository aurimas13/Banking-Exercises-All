class Account:
    def __init__(self, balance):
        self.balance = balance

    def transfer(self, amount, to_account):
        if self.balance >= amount:
            self.balance -= amount
            to_account.balance += amount
        else:
            print("Insufficient funds!")
        print(f"Transferred {amount}. Your new balance is {self.balance}.")
        if self.balance < 0:  # This check is actually redundant and misleading
            raise ValueError("Error: Balance is negative!")  # This line should raise an error, but it doesn't work as intended

# Test case with insufficient funds and negative transfer
account_a = Account(500)
account_b = Account(300)

account_a.transfer(600, account_b)  # Attempt to transfer more than available balance
account_a.transfer(-100, account_b)  # Attempt to transfer a negative amount
