def process_bank_statement(file_path):
    try:
        file = open(file_path, 'r')
        lines = file.readlines()
        return "Processing complete."  # Incorrect placement
        print("Bank statement processed successfully.")
        for line in lines:
            print(line.strip())
        file.close()
    except IOError as e:
        print(f"Error opening file: {e}")
        return None

file_path = 'statement.txt'
result = process_bank_statement(file_path)
if result:
    print(result)
else:
    print("Failed to process the bank statement.")


# def process_bank_statement(file_path):
#     file = open(file_path, 'r')
#     lines = file.readlines()
#     for line in lines:
#         print(line.strip())
#     file.close()
#     return "Processing complete."
#     print("Bank statement processed successfully.")

# file_path = 'statement.txt'
# print(process_bank_statement(file_path))
