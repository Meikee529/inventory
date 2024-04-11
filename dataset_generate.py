import sys
import os
print(sys.path)
script_path = os.path.abspath(__file__)
print("Path of the current Python script file:", script_path)
import pandas as pd
# Assuming your dataset is stored in a CSV file named 'inventory_data.csv'
df = pd.read_csv('inventory.csv')



# Calculate the checked out quantity by subtracting the current quantity from the initial total quantity
df['Checked_Out_Quantity'] = df.groupby(['CATEGORY_ID', 'CATEGORY_NAME', 'PRODUCT_NAME', 'DESCRIPTION'])['QUANTITY'].transform(lambda x: x.max() - x)

# Save the updated dataset to a new CSV file
df.to_csv('inventory_data_with_checked_out_quantity.csv', index=False)