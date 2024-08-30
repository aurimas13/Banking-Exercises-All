class Account:
    def __init__(self, balance):
        self.balance = balance

    def transfer(self, amount, to_account):
        if self.balance >= amount:
            self.balance -= amount
            to_account.balance += amount
            print(f"Transferred {amount}. Your new balance is {self.balance}.")
        else:
            print("Insufficient funds! Transaction cancelled.")

account_a = Account(500)
account_b = Account(300)
account_a.transfer(600, account_b)  # Now correctly handles insufficient funds
