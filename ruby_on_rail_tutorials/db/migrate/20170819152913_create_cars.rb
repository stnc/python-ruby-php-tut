class CreateCars < ActiveRecord::Migration
  def change
    create_table :cars do |t|
      t.string :make
      t.string :model
      t.string :year
      t.integer :doors_count

      t.timestamps
    end
  end
end
