def process_bank_statement(file_path):
    try:
        with open(file_path, 'r') as file:
            lines = file.readlines()
            for line in lines:
                print(line.strip())
        print("Bank statement processed successfully.")
        return "Processing complete."
    except IOError as e:
        print(f"Error opening file: {e}")
        return "Processing failed."

file_path = 'statement.txt'
result = process_bank_statement(file_path)
if result == "Processing complete.":
    print(result)
else:
    print("Failed to process the bank statement.")


# def process_bank_statement(file_path):
#     try:
#         with open(file_path, 'r') as file:
#             lines = file.readlines()
#             for line in lines:
#                 print(line.strip())
#         print("Bank statement processed successfully.")
#         return "Processing complete."
#     except IOError as e:
#         print(f"Error opening file: {str(e)}")
#         return "Processing failed."

# file_path = 'statement.txt'
# print(process_bank_statement(file_path))
